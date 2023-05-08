import face_recognition
import cv2

print(cv2.__version__)
print("DIEGOOOO")

# Cargamos las imágenes a comparar
img1 = cv2.imread('helpers/imgs/Daniela2.jpeg')
img2 = cv2.imread('helpers/imgs/Daniela.jpeg')

# Detectamos los rostros en las imágenes
face_locations1 = face_recognition.face_locations(img1)
face_locations2 = face_recognition.face_locations(img2)

# Si no se detecta exactamente un rostro en alguna de las imágenes, salimos del programa
if len(face_locations1) != 1 or len(face_locations2) != 1:
    print("No se detectó exactamente un rostro en alguna de las imágenes.")
    exit()

# Codificamos los rostros detectados en cada imagen
face_encoding1 = face_recognition.face_encodings(img1, face_locations1)[0]
face_encoding2 = face_recognition.face_encodings(img2, face_locations2)[0]

# Comparamos los rostros codificados
face_distances = face_recognition.face_distance([face_encoding1], face_encoding2)

# Imprimimos el resultado
print("El error absoluto medio entre los rostros es:", face_distances[0])

# Dibujamos los rostros detectados en las imágenes
top1, right1, bottom1, left1 = face_locations1[0]
cv2.rectangle(img1, (left1, top1), (right1, bottom1), (0, 255, 0), 2)
top2, right2, bottom2, left2 = face_locations2[0]
cv2.rectangle(img2, (left2, top2), (right2, bottom2), (0, 255, 0), 2)

# Mostramos las imágenes con los rostros detectados
# cv2.imshow('Imagen 1', img1)
# cv2.imshow('Imagen 2', img2)
cv2.waitKey(0)
cv2.destroyAllWindows()
