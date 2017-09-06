#!/bin/bash

set -vx

service_name="temporary-service"
appFolder="MSTemporary"


curl -v -k "http://negocd-wc-1p.sys.comcast.net:8153/go/api/admin/config.xml" -u %userid%:%pwd% -D header.txt >> original_config.xml

if grep "<pipelines group=\"einstein-$service_name\">" original_config.xml > /dev/null
then
  echo "A pipeline group for einstein-$service_name already exists!"
  exit 1
else
  echo "Generating pipeline configurations for group einstein-$service_name"

  md5=$(grep 'X-CRUISE-CONFIG-MD5' header.txt |  sed 's/^[^:]*: //' | tr -d '\r')

  grep "" new_pipeline.xml > 

  line_to_insert_above=$(cat original_config.xml | grep -n '<pipelines group="einstein-ms-template'  | cut -d ":" -f 1)
  sed "$((line_to_insert_above-1))r new_pipeline.xml" original_config.xml >> final_config.xml

fi