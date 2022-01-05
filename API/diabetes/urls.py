from django.urls import path
from diabetes import views

urlpatterns = [
   
      path('predict/', views.predict.as_view())
]