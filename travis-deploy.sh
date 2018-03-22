#!/usr/bin/env bash

# 1. Clone complete SVN repository to separate directory
svn co https://plugins.svn.wordpress.org/$PLUGIN_SLUG ../svn

# 2. Copy git repository contents to SNV trunk/ directory
rm -rfv ../svn/trunk/*
cp -fR ./* ../svn/trunk/

# 3. Switch to SVN repository
cd ../svn/trunk/

# 4. Move assets/ to SVN /assets/
rm -rfv ../assets/*
mv ./wporg_assets/* ../assets/

# 5. Clean up unnecessary files
rm -rf .git/
rm travis-deploy.sh
rm .travis.yml

# 6. Go to SVN repository root
cd ../

# 7. Create SVN tag
cp -fR trunk tags/$TRAVIS_TAG

# 8. Push SVN tag
svn add --force * --auto-props --parents --depth infinity -q
svn ci --non-interactive --no-auth-cache -m "Release $TRAVIS_TAG" --username $SVN_USERNAME --password $SVN_PASSWORD