@echo off

rem call vendor\bin\doctrine orm:convert-mapping -f --from-database annotation Entity/
rem call vendor\bin\doctrine orm:generate-entities --generate-annotations=true --generate-methods=true Entity/


:SUB1
rem **********Construit le mapping***************
call vendor\bin\doctrine orm:convert-mapping -f --from-database annotation Entity/
goto :SUB2
:end


:SUB2
 rem *************************
 rem ** Construit les getter et les setters pour les Classes
 rem *************************
 call vendor\bin\doctrine orm:generate-entities --generate-annotations=true --generate-methods=true Entity/
 call del /s Entity\*~
:end