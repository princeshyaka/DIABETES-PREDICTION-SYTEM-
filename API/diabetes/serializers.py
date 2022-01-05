from rest_framework import serializers


 

class PredictionSerializer(serializers.Serializer):
    pregnancies = serializers.IntegerField(required=True)
    glucose=serializers.DecimalField(required=True,max_digits=4, decimal_places=1)
    bloodPressure=serializers.DecimalField(required=True,max_digits=4, decimal_places=1)
    skinThickness=serializers.DecimalField(required=True,max_digits=4, decimal_places=1)
    insulin=serializers.DecimalField(required=True,max_digits=4, decimal_places=1)
    BMI = serializers.DecimalField(required=True,max_digits=4, decimal_places=2)
    diabetesPedigreeFunction = serializers.DecimalField(required=True,max_digits=4, decimal_places=3)
    age=serializers.IntegerField(required=True)
