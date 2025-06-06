#!/bin/sh

# Entrypoint script for syncing the database for developers
# Usage: ./entrypoint.sh export|import [filename.sql]

set -e

# Ensure the MySQL CA is trusted in the container
if [ -f /var/www/html/mysql-certs/ca.pem ]; then
  cp /var/www/html/mysql-certs/ca.pem /usr/local/share/ca-certificates/harborn-mysql-ca.crt 2>/dev/null || true
  update-ca-certificates 2>/dev/null || true
fi

COMMAND=$1
FILE=${2:-db.sql}

WP_CLI_FLAGS="--allow-root"

case $COMMAND in
  export)
    echo "Exporting database to $FILE..."
    wp db export $FILE $WP_CLI_FLAGS
    ;;
  import)
    echo "Importing database from $FILE..."
    wp db import $FILE $WP_CLI_FLAGS
    ;;
  *)
    echo "Usage: $0 export|import [filename.sql]"
    exit 1
    ;;
esac
