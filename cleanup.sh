#!/bin/bash

ls -t /home/username/backups/*/*.tar.gz  | tail -n +9 | xargs rm --
