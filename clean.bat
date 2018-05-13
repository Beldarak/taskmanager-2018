
rem ---------------------------------------------------------------
rem  Command line script for Windows to clean a Yii2 basic app 
rem  Put it in the root dir of your app
rem ---------------------------------------------------------------

@echo off
cls

echo YII 2 BASIC APP CLEANING TOOL FOR WINDOWS - v1.0
echo (c) A. ROLLMANN, 2018
echo ------------------------------------------------
echo.

echo NETTOYAGE DES CACHES DE L'APPLICATION
echo Les fichiers temporaires vont etre effaces.
pause

set app_dir=%CD%
@echo ------------------------------------------------

rem Delete runtime
set dirtoflush=%app_dir%\runtime
echo Deleting ALL files and folders in
echo %dirtoflush%
cd /d "%dirtoflush%"
for /f "delims=" %%i in ('dir /b') do (
	if not %%~xi == .gitignore ( 
	    rmdir /s/q "%%i" || del /s/q "%%i"
	    echo  %%i DELETED
	)
)
@echo ------------------------------------------------

rem Delete assets
set dirtoflush=%app_dir%\web\assets
echo Deleting ALL files and folders in
echo %dirtoflush%
cd /d "%dirtoflush%"
for /f "delims=" %%i in ('dir /b') do (
	if not %%~xi == .gitignore ( 
	    rmdir /s/q "%%i" || del /s/q "%%i"
	    echo  %%i DELETED
	)
)

cd /d "%app_dir%"
echo.
echo OPERATIONS TERMINEES
