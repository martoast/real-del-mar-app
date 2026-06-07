#!/usr/bin/env bash
# ------------------------------------------------------------------
# Build a static, Netlify-ready export of the Real del Mar site into ../dist
# Usage:  ./build-static.sh
# Then drag the ../dist folder onto Netlify (or `netlify deploy --prod --dir ../dist`).
# ------------------------------------------------------------------
set -euo pipefail
cd "$(dirname "$0")"                     # app/
OUT="../dist"
PORT=8099

echo "▸ Building front-end assets…"
npm run build >/dev/null

echo "▸ Rendering the homepage…"
php artisan serve --port="$PORT" >/tmp/rdm-build-serve.log 2>&1 &
SERVER_PID=$!
trap 'kill "$SERVER_PID" 2>/dev/null || true' EXIT
# wait for the server to answer
for i in $(seq 1 20); do
  curl -s -o /dev/null "http://127.0.0.1:$PORT" && break || sleep 0.5
done

rm -rf "$OUT"; mkdir -p "$OUT"
curl -s "http://127.0.0.1:$PORT" -o "$OUT/index.html"
kill "$SERVER_PID" 2>/dev/null || true

echo "▸ Making asset URLs root-relative…"
sed -i '' "s#http://127.0.0.1:$PORT/#/#g; s#http://localhost:$PORT/#/#g; s#http://localhost/#/#g" "$OUT/index.html"
perl -pi -e "s{http:(?:\\\\*/){2}127\\.0\\.0\\.1:$PORT}{}g; s{http:(?:\\\\*/){2}localhost(?::$PORT)?}{}g" "$OUT/index.html"

echo "▸ Copying static assets…"
for d in build images videos fonts; do cp -R "public/$d" "$OUT/$d"; done
cp public/favicon.ico public/robots.txt "$OUT/" 2>/dev/null || true

echo "▸ Writing cache headers (no netlify.toml/_redirects — keeps drag-drop clean)…"
cat > "$OUT/_headers" <<'HD'
/build/assets/*
  Cache-Control: public, max-age=31536000, immutable
/fonts/*
  Cache-Control: public, max-age=31536000, immutable
/images/*
  Cache-Control: public, max-age=2592000
/videos/*
  Cache-Control: public, max-age=2592000
HD

LEFT=$(grep -c '127.0.0.1\|localhost' "$OUT/index.html" || true)
echo "✓ Done. Output: $(cd "$OUT" && pwd)  ($(du -sh "$OUT" | cut -f1))  | leftover host refs: $LEFT"
