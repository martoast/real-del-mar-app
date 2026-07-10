#!/usr/bin/env bash
# Netlify CI build: render the Laravel app to a STATIC bundle in ./dist.
# This is a static landing page — there is no server or database at runtime.
# Laravel is only used at build time to render index.html once; below we force
# array/sync drivers so that one-time render never touches a database.
# (Locally the export goes to ../dist; CI sets OUT=dist so the publish dir
# lives inside the repo.)
set -euo pipefail

composer install --no-interaction --prefer-dist --quiet

[ -f .env ] || cp .env.example .env

# Make the build fully self-contained and DB-free. Force these into .env so
# they can't be shadowed by env-var precedence or a cached config.
force_env() {
  local key="$1" val="$2"
  if grep -qE "^${key}=" .env; then
    perl -pi -e "s/^${key}=.*/${key}=${val}/" .env
  else
    printf '%s=%s\n' "$key" "$val" >> .env
  fi
}
force_env APP_ENV production
force_env APP_DEBUG false
force_env SESSION_DRIVER array
force_env CACHE_STORE array
force_env QUEUE_CONNECTION sync

php artisan key:generate --force --quiet
OUT=dist ./build-static.sh
