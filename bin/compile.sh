#!/usr/bin/env bash

set -e

# prepare the source of icons by cloning the repo
TEMP_DIR=tmp
mkdir -p $TEMP_DIR
SOURCE=$TEMP_DIR/ikonate
git clone git@github.com:mikolajdobrucki/ikonate.git $TEMP_DIR/ikonate

DIRECTORY=$(cd `dirname $0` && pwd)
RESOURCES=$DIRECTORY/../resources/svg

echo $SOURCE
echo "Reading icons..."
for ICON_DIR in $SOURCE/icons/*; do
    # Category Directory Path
    # echo $ICON_DIR
    # exit

    # Icon Name
    ICON_NAME=${ICON_DIR##*/}
    # echo $ICON_NAME

    CONVERTED_ICON_DESTINATION_NAME="${ICON_NAME//_/-}"

    CP_COMMAND='cp '$ICON_DIR' '$RESOURCES/$CONVERTED_ICON_DESTINATION_NAME
    $CP_COMMAND
    # exit

done

echo "copied all svgs!"
echo "Removing "$TEMP_DIR
rm -rf $TEMP_DIR

echo "All Done!"
# echo "Run `php bin/compile.php` to update the svgs"
