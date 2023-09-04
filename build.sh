#!/usr/bin/env bash

# Abort in case of error
set -e

# Cleanup
rm -rf frontend/dist

# Build static site
(cd frontend && npm run build)

# === Include any other build steps here ===

echo ""
echo "Done! The site is ready to be deployed."
echo ""
