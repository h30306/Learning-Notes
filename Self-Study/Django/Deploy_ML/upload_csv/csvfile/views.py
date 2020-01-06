import csv, io
from django.shortcuts import render
from django.contrib import messages
from .models import up_csv
from csvfile import models
from .ML_Models.Linear_regression import lr
from .ML_Models.SGDregression import SGD
import numpy as np
import pandas as pd

def profile_upload(request):
    # declaring template
    template = "profile_upload.html"
    data = up_csv.objects.all()

    prompt = {
        'order': '上傳檔案之必要欄位: x,y ',
        'profiles': data
              }

    if request.method == "GET":
        return render(request, template, prompt)

    csv_file = request.FILES['file']
    if not csv_file.name.endswith('.csv'):
        messages.error(request, 'THIS IS NOT A CSV FILE')
    data_set = csv_file.read().decode('UTF-8')

    io_string = io.StringIO(data_set)
    next(io_string)
    up_csv.objects.update_or_create(
            name=csv_file.name.split('.')[0],
            file=csv_file,
        )
    return render(request, template, prompt)

def ML(request):
    global model_name
    template = "pred.html"
    file_name = request.POST.get('file_name')
    model_name = request.POST.get('model_name')
    df = pd.read_csv(r'uploads/{}.csv'.format(file_name))
    x = np.array(df['x']).reshape(-1,1)
    y = np.array(df['y']).reshape(-1,1)
    y_pred='data type error'
    if model_name == 'Linear':
        model, y_pred = lr(x,y)
    elif model_name == 'SGD':
        model, y_pred = SGD(x,y)
    context = {'x':x.ravel(),
               'y_pred':y_pred,
               'y':y.ravel(),
               'file_name':file_name,
               'model_name':model_name}
    return render(request, template, context)