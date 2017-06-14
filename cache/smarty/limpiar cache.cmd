@echo off
rem ------Entramnos al disco d
d:
rem ------Entramnos al directorio donde esta  el archivo
cd %~dp0

rm -r cache/*
rm -r compile/*