#!/bin/bash
if [ $USER != "root" ]
then
    echo "Error: Debe ejecutarse el script como usuario root, se está ejecutando como $USER"
else
    echo "Comprobando que la carpeta del instalador esté por aquí cerca..."
        if [ -d "./virtuaVoca_INSTALL/" ]; then
            echo "Se ha encontrado el instalador"
        else
            echo "No se ha encontrado, clona todo el repositorio e inténtalo de nuevo"
            exit
        fi
    echo "Cambiando permisos de la carpeta 'virtuaVoca_INSTALL'..."
    sudo chmod -R 777 ./virtuaVoca_INSTALL
    echo "Cambiando permisos dentro de la carpeta 'virtuaVoca_INSTALL'..."
    sudo chmod -R 777 ./virtuaVoca_INSTALL/*
    echo "Copiando 'virtuaVoca_INSTALL' a '/var/www/html/'..."
    # sudo cp -r ./virtuaVoca_INSTALL /var/www/html/virtuaVoca_INSTALLBETA
    echo ""
    echo ""
    
    echo "Fin, puedes acceder desde 'http://$(ip addr show $(ip route | awk '/default/ { print $5 }') | grep "inet" | head -n 1 | awk '/inet/ {print $2}' | cut -d'/' -f1)/virtuaVoca_INSTALLBETA"



fi