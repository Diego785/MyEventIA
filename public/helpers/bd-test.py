import mysql.connector
import face_recognition
import numpy as np
import sys
import cv2
import urllib.request
import requests
from PIL import Image
from io import BytesIO
import os
import tempfile


# ID de fotógrafo recibido como parámetro
photographer = str(sys.argv[1])
# print(photographer)

event = str(sys.argv[2])
# print(event)

image = str(sys.argv[3])
print(image)

# Establece la conexión con la base de datos
mydb = mysql.connector.connect(
    host="127.0.0.1",
    user="root",
    password="",
    database="my_event"
)


# -------------------- ACCESO A LA BASE DE DATOS --------------------------- #


# Crea un cursor para realizar operaciones en la base de datos
mycursor = mydb.cursor()
lastPhoto = mydb.cursor()

# Ejecuta una consulta SELECT en la tabla 'ejemplo'
mycursor.execute(
    "SELECT * FROM photos WHERE photographer_id = " + str(photographer) + " AND event_id = " + str(event))
# Obtén los resultados de la consulta
myresult = mycursor.fetchall()

# Ejecuta una consulta SELECT en la tabla 'ejemplo'
lastPhoto.execute("SELECT * FROM photos WHERE photographer_id = " + str(photographer) + " AND event_id = " + str(event) + " ORDER BY id DESC LIMIT 1")
# Obtén los resultados de la consulta
myImage = lastPhoto.fetchone()

# print(myresult)

# -------------------- LECTURA DE IMÁGENES --------------------------- #

# Leer la imagen desde la URL
url = 'https://my-event-dhv.s3.amazonaws.com/'


headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
    'referer': 'https://my-event-dhv.s3.amazonaws.com/',
}

url_image2 = url + myImage[1]
response2 = requests.get(url_image2, headers=headers)

bytes_imagen2 = response2.content
img2 = Image.open(BytesIO(bytes_imagen2))
img2.show()
unknown_image2 = np.array(img2)

known_face_encodings = face_recognition.face_encodings(unknown_image2)

for index in myresult:
    url_image = url + ''.join(index[1])
    response = requests.get(url_image, headers=headers)
    if response.status_code == 200:

        # ---------------------- APLICAMOS LA IA CON LA IMÁGEN QUE TRAJIMOS DE LA BD ---------------------------- #
        # Imágen 1
        # Cargar la imagen con el rostro a buscar
        bytes_imagen = response.content
        img = Image.open(BytesIO(bytes_imagen))
        # img.show()
        unknown_image = np.array(img)

        # Obtener la codificación del rostro a buscar
        unknown_face_encoding = face_recognition.face_encodings(unknown_image)[
            0]

        # Comparar la codificación del rostro a buscar con las codificaciones de los rostros en la imagen con varios rostros
        results = face_recognition.compare_faces(
            known_face_encodings, unknown_face_encoding)

        # Verificar si se encontró una coincidencia
        if True in results:
            print(index[0])
            print(index[1])
            print(index[2])
            print(index[3])
        # else:
        #     print("La persona no se encuentra en la imagen con varios rostros.")
    else:
        print('Error al obtener la imagen')