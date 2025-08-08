#!/usr/bin/env bash

NODE_VERSION="20"

if [ ! -f package.json ]; then
  echo "❌ Error: No se encontró package.json en el directorio actual."
  echo "➡️  Asegúrate de estar en la raíz del proyecto Node.js."
  exit 1
fi

ACTION=$1

if [ -z "$ACTION" ]; then
  echo "❌ Debes indicar una acción: install, dev o build"
  echo "Ejemplo: ./node-helper.sh dev"
  exit 1
fi

case "$ACTION" in
  install)
    CMD="npm install"
    ;;
  dev)
    CMD="npm install && npm run dev"
    ;;
  build)
    CMD="npm install && npm run build"
    ;;
  *)
    echo "❌ Acción no válida: $ACTION"
    echo "Opciones válidas: install, dev, build"
    exit 1
    ;;
esac

# Ejecutar en contenedor Docker
sudo docker run --rm -it \
  -u "$(id -u):$(id -g)" \
  -v "$(pwd)":/app \
  -w /app \
  -p 5173:5173 \
  node:${NODE_VERSION} \
  sh -c "$CMD"