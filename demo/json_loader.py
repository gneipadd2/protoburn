# -*- coding: utf-8 -*-
"""
Created on Wed Apr 29 23:23:59 2015

@author: Wasit
"""

#read doc at https://docs.python.org/2/library/json.html
import json
from pprint import pprint

with open('static/data.json') as data_file:
    data = json.load(data_file)

pprint(data)