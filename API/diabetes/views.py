
from django.http import HttpResponse, JsonResponse
from django.views.decorators.csrf import csrf_exempt
from rest_framework.parsers import JSONParser

from .serializers import  PredictionSerializer
from django.shortcuts import render
from .apps import Predictator

# Create your views here.

from django.shortcuts import get_object_or_404
from rest_framework.views import APIView
from rest_framework.response import Response
from rest_framework import status
from rest_framework import views
class predict(views.APIView):
       def post(self, request):
         
        content=request.data
        serializer=PredictionSerializer(data=content)
        # results=return_prediction(content)
        # return Response(results[0], status=status.HTTP_200_OK)
        # return Response(results)
        if serializer.is_valid():
            results=return_prediction(serializer.data)
            return Response(int(results[0]), status=200)

        return JsonResponse(serializer.errors, status=422)
     



def return_prediction(sample_json):
    pregnancies=sample_json['pregnancies']
    glucose=sample_json['glucose']
    bloodPressure=sample_json['bloodPressure']
    skinThickness=sample_json['skinThickness']
    insulin=sample_json['insulin']
    BMI=sample_json['BMI']
    diabetesPedigreeFunction=sample_json['diabetesPedigreeFunction']
    age=sample_json['age']
   
    
    predict_disease=[[pregnancies, glucose, bloodPressure, skinThickness, insulin, BMI, diabetesPedigreeFunction,age]]
    predict_disease=Predictator.scaler.transform(predict_disease)
    return Predictator.model.predict_classes(predict_disease)