import mysql.connector
import face_recognition
import numpy as np
import sys
import cv2
import urllib.request
import requests
from PIL import Image
from io import BytesIO


# ID de fotógrafo recibido como parámetro
photographer = str(sys.argv[1])
print(photographer)

event = str(sys.argv[2])
print(event)

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

# Ejecuta una consulta SELECT en la tabla 'ejemplo'
mycursor.execute(
    "SELECT * FROM photos WHERE photographer_id = " + str(photographer) + " AND event_id = " + str(event))

# Obtén los resultados de la consulta
myresult = mycursor.fetchall()

print(myresult)

# # -------------------- LECTURA DE IMÁGENES --------------------------- #

# # Leer la imagen desde la URL
# main_url = 'https://my-event-dhv.s3.amazonaws.com/'
# url = 'https://my-event-dhv.s3.amazonaws.com/'


# headers = {
#     'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
#     'referer': 'https://my-event-dhv.s3.amazonaws.com/',
# }

# i = 0
# # Imágen 2
# img2 = cv2.imread('helpers/imgs/Daniela.jpeg')
# for index in myresult:
#     url_image = url + ''.join(index[1])
#     response = requests.get(url_image, headers=headers)
#     if response.status_code == 200:

#         # ---------------------- APLICAMOS LA IA CON LA IMÁGEN QUE TRAJIMOS DE LA BD ---------------------------- #
#         # Imágen 1
#         bytes_imagen = response.content
#         img = Image.open(BytesIO(bytes_imagen))
#         img.show()
#         img1 = np.array(img)
#         # img = img1.convert('RGB')

#         # Detectamos los rostros en las imágenes
#         face_locations1 = face_recognition.face_locations(img1)
#         face_locations2 = face_recognition.face_locations(img2)

#         # Si no se detecta exactamente un rostro en alguna de las imágenes, salimos del programa
#         if len(face_locations1) != 1 or len(face_locations2) != 1:
#             print("No se detectó exactamente un rostro en alguna de las imágenes.")
#             exit()

#         # Codificamos los rostros detectados en cada imagen
#         face_encoding1 = face_recognition.face_encodings(
#             img1, face_locations1)[0]
#         face_encoding2 = face_recognition.face_encodings(
#             img2, face_locations2)[0]

#         # Comparamos los rostros codificados
#         face_distances = face_recognition.face_distance(
#             [face_encoding1], face_encoding2)

#         # Imprimimos el resultado
#         print("El error absoluto medio entre los rostros es:",
#               face_distances[0])

#         if face_distances[0] <= 0.50 :
#           print("ENCONTRAMOS COINCIDENCIA!!!")
#           print(index[0])
#           break

#     else:
#         print('Error al obtener la imagen')
