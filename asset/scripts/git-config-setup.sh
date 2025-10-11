#!/usr/bin/env bash
# git-config-setup.sh
# Run this script to set common global git configuration values.
# Usage: bash scripts/git-config-setup.sh "Your Name" "you@example.com"

set -euo pipefail

if [ "$#" -lt 2 ]; then
  echo "Usage: $0 \"Full Name\" \"email@example.com\""
  exit 1
fi

NAME="$1"
EMAIL="$2"

# Set identity
git config --global user.name "$NAME"
git config --global user.email "$EMAIL"

# Useful defaults
git config --global init.defaultBranch main
# Use macOS keychain credential helper when available
if command -v git-credential-osxkeychain >/dev/null 2>&1; then
  git config --global credential.helper osxkeychain
fi

# Set default editor to VS Code if available, fallback to nano
if command -v code >/dev/null 2>&1; then
  git config --global core.editor "code --wait"
else
  git config --global core.editor "nano"
fi

# Helpful aliases
git config --global alias.st status
git config --global alias.co checkout
git config --global alias.br branch
git config --global alias.ci commit

# Show what we set
echo "Configured git global settings:"
git config --global --list

echo "Done. If you want to amend the last commit author to use this identity, run:"
echo "  git commit --amend --reset-author --no-edit"
