@echo off
echo "Are you sure to run fresh migration & seeder"

CHOICE /C YN 

IF %ERRORLEVEL% EQU 1 goto CONTINUE
IF %ERRORLEVEL% EQU 2 goto END

:EXIT
exit

:CONTINUE
php artisan migrate:fresh --seed