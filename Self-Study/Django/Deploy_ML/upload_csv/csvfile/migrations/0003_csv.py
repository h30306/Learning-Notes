# Generated by Django 2.2.5 on 2019-10-17 02:18

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('csvfile', '0002_auto_20191009_0318'),
    ]

    operations = [
        migrations.CreateModel(
            name='csv',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=150)),
                ('file', models.FileField(max_length=150, upload_to='')),
            ],
        ),
    ]
