#!/usr/bin/env bash
#!/bin/bash
ENV_TAG_PREFIX=$1
IMAGE="registry.gitlab.com/sentryoz/vinafa_laravel"

# get highest tag number
VERSION=`git rev-parse --short HEAD`

NEW_TAG="$ENV_TAG_PREFIX$VERSION"

#######   Processing  ###########
docker build -t $IMAGE:$NEW_TAG . && docker tag $IMAGE:$NEW_TAG $IMAGE:latest && docker push $IMAGE
echo "Rease new image with tag: $NEW_TAG"
#######   Processing  ###########

#get current hash and see if it already has a tag
echo "###############################################################"
