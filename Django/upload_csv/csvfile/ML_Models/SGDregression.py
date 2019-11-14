from sklearn.linear_model import SGDRegressor
'''
input : 2D array
'''
def SGD(x,y):
	lr = SGDRegressor()
	model = lr.fit(x,y.ravel())
	y_pred = lr.predict(x)
	return model,y_pred