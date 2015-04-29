# -*- coding: utf-8 -*-
"""
Created on Wed Apr 29 16:51:32 2015

@author: Wasit
"""

from flask import Flask
app = Flask(__name__)

@app.route("/")
def hello():
    return "Hello World!!"

if __name__ == "__main__":
    app.run(debug=True)