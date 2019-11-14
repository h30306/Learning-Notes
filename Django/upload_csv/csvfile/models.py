from django.db import models
from django import forms
# Create your models here.

class up_csv(models.Model):
    name = models.CharField(max_length=150)
    file = models.FileField(upload_to='uploads/')
    def __str__(self):
        close = str(self.name)
        return close