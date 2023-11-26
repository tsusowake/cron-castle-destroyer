#!/bin/bash

array=(
  'DB_HOST'
  'DB_USER'
  'DB_PASSWORD'
  'DB_NAME'
)

TMP_FILENAME=".env.tmp.$$.$(date +%s)"
FILENAME='.env'

for key in "${array[@]}"; do
  SECRET=$(gcloud secrets versions access latest --secret="${key}")
  echo "${key}=${SECRET}"
done >${TMP_FILENAME}

mv ${TMP_FILENAME} ${FILENAME}
