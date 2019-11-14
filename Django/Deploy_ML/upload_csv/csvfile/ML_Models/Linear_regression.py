from sklearn.linear_model import LinearRegression
'''
input : 2D array
'''
def lr(x,y):
	lr = LinearRegression()
	model = lr.fit(x,y)
	y_pred = lr.predict(x)
	return model,y_pred