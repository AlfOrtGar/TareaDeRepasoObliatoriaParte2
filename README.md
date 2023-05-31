# TareaDeRepasoObliatoriaParte2

He añadido los siguientes puntos

1. Mostrar un vídeo de youtube con un trailer
- Si no tiene video muestra el reproductor pero da error al ponerlo. Esto se debe a que me causaba problemas el intentar alternar entre un iframe y texto plano sin ningún tipo de error

2. Descargar la información de todas las películas a formato json, csv o pdf.
- Está puesto en JSON mediante un formulario dado que con el boton no funcionaba

3. Permitir votar por una película, mostrar en detalles su puntuación (la media y nº de votaciones realizadas)
- Está implementado y te devuelve al listado de peliculas cada vez que se usa para evitar votos de más al recargar

4. Evitar parcialmente que un usuario vote mas de 5 veces al día mediante el uso de cookies.
- No da ningún mensaje personalizado de por si, pero a partir de las cinco, independientemente de cuanto lo intentes no se incrementan ni los votos ni el numero de ellos
