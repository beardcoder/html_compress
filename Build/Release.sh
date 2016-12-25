#!/bin/bash
EXT_VERSION="$(git describe --tags $(git rev-list --tags --max-count=1))"

echo "Cleanup"
rm -rf .build

echo "Build ext_emconf.php"
php ./Build/GenerateExtEmConf.php

echo "Package as zip"
mkdir Export; zip -9 -r --exclude=".editorconfig" --exclude="*.git*" --exclude=".build/*" --exclude=".idea/*" --exclude="Tests/*" --exclude="Export/" Export/html_compress_$EXT_VERSION.zip .
