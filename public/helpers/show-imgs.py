import cv2
import face_recognition

# Cargar la imagen con varios rostros
image_to_check = face_recognition.load_image_file("helpers/imgs/Grupo2.jpeg")

# Obtener las codificaciones de los rostros en la imagen
known_face_encodings = face_recognition.face_encodings(image_to_check)

# Cargar la imagen con el rostro a buscar
unknown_image = face_recognition.load_image_file("helpers/imgs/Diego.jpeg")

# Obtener la codificación del rostro a buscar
unknown_face_encoding = face_recognition.face_encodings(unknown_image)[0]

# Comparar la codificación del rostro a buscar con las codificaciones de los rostros en la imagen con varios rostros
results = face_recognition.compare_faces(known_face_encodings, unknown_face_encoding)

# Verificar si se encontró una coincidencia
if True in results:
    print("La persona se encuentra en la imagen con varios rostros.")
else:
    print("La persona no se encuentra en la imagen con varios rostros.")
