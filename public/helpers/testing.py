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

if os.path.exists(image):
    with open(image, 'rb') as archivo:
        print(image)
else:
    print("El archivo no existe en la ruta especificada.")