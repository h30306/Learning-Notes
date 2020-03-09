#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Created on Sun Mar  8 23:17:00 2020

@author: howardchung
"""

from selenium import webdriver
from selenium.webdriver.support.ui import Select
import time
from multiprocessing.dummy import Pool as ThreadPool
import os
os.listdir()
#初始化啟動chrome webdriver
driverpath="./chromedriver80"
date_list = ['1081015','1080315','1071031','1070315','1061031','1060315','1051031','1050315','1041031','1040315','1031031','1030315','1021031','1020315','1011130','1010315','1001031','1000315','9910','990315','9810','9804','9711','9704','9703','9702']
city_list = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18']
run = [(i,j) for i in date_list for j in city_list]
href = []
def crawler_link(data):
    d = data[0]
    c = data[1]
#    print(data)
    browser=webdriver.Chrome(executable_path=driverpath)
    url="https://www.shs.edu.tw/index.php?p=search"
    browser.get(url)#get方式進入網站
    time.sleep(3)#網站有loading時間
    
    selectCath=Select(browser.find_element_by_id("s_cath"))
    selectCath.select_by_value('1')#選單項目定位
    
    selectcontest=Select(browser.find_element_by_id("s_contest_number"))
    selectcontest.select_by_value(d)#選單項目定位
    
    selectarea=Select(browser.find_element_by_id("s_area"))
    selectarea.select_by_value(c)#選單項目定位
    
    searchBtn=browser.find_element_by_id("search_button")#查詢按鈕定位
    searchBtn.click()#模擬點擊
    browser.implicitly_wait(30)
    number = browser.find_element_by_xpath("/html/body/div[1]/div[2]/div[2]/form/table[1]/tbody/tr/td[1]/span[4]").text
    if number == 0:
        browser.close()
        return print('No Article')
    else:
        for a in range(2,number+2):
            href.append(browser.find_element_by_xpath("/html/body/div[1]/div[2]/div[2]/form/table[2]/tbody/tr/td/table/tbody/tr[{}]/td[9]/a".format(a)).get_attribute("href"))
        time.sleep(45)
        browser.close()

result = set()

def crawler_article(data):
    browser=webdriver.Chrome(executable_path=driverpath)
    url = data
    browser.get(url)
    time.sleep(3)
    text = browser.find_element_by_xpath('/html/body/div[1]/div[2]/div[2]/table[7]/tbody/tr[2]/td').text
    result.add(text)
    
pool = ThreadPool(4)
pool.map(crawler_link, run)
pool.map(crawler_article, href)
pool.close()
pool.join()
pool.map



