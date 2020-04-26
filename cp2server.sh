#!/bin/bash
# Delete content of xampp folder
rm -Rf /mnt/d/Programme/xampp/htdocs/phpAuth/*
echo "XAMPP Content deteled."

# Copy content of src folder to xampp folder
cp ./src/* /mnt/d/Programme/xampp/htdocs/phpAuth/
echo "Copied all items of src/ to XAMPP Folder."

