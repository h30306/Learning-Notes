# NumPy

[TOC]

## 隨機產生資料 np.random.randn()
```python=
#隨機產生資料
array_ = np.random.randn(1,2)
```
## 建立值為0,1的array np.zeros(), ones()
```python=
#建立值為0(1)的array
np.zeros(10, int)
np.zeros([2,4], int)
```
## range的np版本 np.arange()
```python=
#range的np版本
np.arange(5)
#array([0,1,2,3,4])
```

## 對角線為1其他為0的數列 np.eye()
```python=
#對角線為1其他為0的數列
np.eye(10)
```

## 用固定值填滿array np.full()
```python=
#用固定值填滿array
#np.full((array.shape),value)
np.full([2,3],10)
```

## 轉換值型態 array_.astype(np.dtype)
```python=
#轉換型態
array_.astype(np.float64)
```

## 複製成新物件 copy()
```python=
array_ = np.array([1,2,3,4,5])
slice_ = array_[1:3]
#slice出來的只是view原來的array
#若更改slice_也會更動到array_
#如果是要產生新的資料
slice_ = array_[1:3].copy()
```

## 布林索引
```python=
#一個為布林值的array
x = array([True,False])
array_ = array([[1,2,3],[4,5,6]])
array_[x]
#輸出 array([[1,2,3]])
```

## index索引
```python=
arr = np.empty((2,3))

for i in range(2):
    arr[i] = i
#arr
#array([[0,0,0],
#       [1,1,1]])

arr[[1]]#第二列
#arr([[1,1,1]])

arr = np.arange(32).reshape((8,4))
arr[[1,5,7,2],[0,3,1,2]]
#選取(1,0),(5,3),(7,1),(2,2)的元素

arr[[1]][:,[0,3,1,2]]
#切割加排序
```

## 計算內積 np.dot()
```python=
#計算內積
```

## 軸轉換(轉置)transpose()
```python=
arr.transpose(1,0,2)#都是index跟value沒關係
#軸轉換,0->1,1->0,2->2
#https://blog.csdn.net/u012762410/article/details/78912667
```

## 兩軸轉換 swapaxes()
```python=
arr.swaraxes(1,2)
#選擇要轉換的軸,只能兩個
```

## 取e的x次方 np.exp()
```python=
np.exp(arr)
#e的x次方
```

## 取兩array大值 np.maximum(x,y)
```python=
np.maximum([1,2,3],[2,1,4])
```

## 浮點數的整數跟小數分開 np.modf()
```python=
x, y = np.modf(arr)
#把浮點數的整數跟小數分開
```

## 計算絕對值 np.abs(), np.fabs()
```python=
np.abs(arr)
```

## 平方根, 平方 np.sqrt() np.square()
```python=
np.sqrt(arr)
np.square(arr)
```

## 取log np.log() , log10 ,log2 log1p
```python=
np.log1p(arr)#log(1+x)
```

## 計算正負值 np.sign()
```python=
np.sign(arr)#1正, 0零, -1負
```

## 向上(下)取整數 np.ceil() np.floor()
```python=

```

## 取最靠近的整數,保留其dtype np.rint()
```python=

```

## 標示是否為Nan np.isnan()
```python=

```

## 標示是有限還無限 np.isfinite() isinf()
```python=

```

## 三角函數 np.cos() cosh sin sinh tan tanh
```python=
#反向三角函數在前面加arc
```

## ~array的真值 np.logical_not()
```python=

```

## 陣列相減 np.subtract(arr1,arr2)
```python=

```

## 陣列相除 np.divide() floor_divide()
```python=

```

## arr1的arr2次方 np.power()
```python=

```

## 相除餘數 np.mod()
```python=

```

## 陣列表達式 np.where()
```python=
np.where(cod,動作,動作)#(條件,成立的話,不成立的話)
result = np.where(arr>0,2,arr)#arr大於0改成2,反之arr元素
```

## 加總, 平均 np.sum(axis=0 or 1) mean(0 or 1)
```python=
#2D array 直行加總
```

## 累加次數, 累乘 np.cumsum() np.cumpord(axis=1)
```python=

```

## 最小值跟最大值的索引 np.argmin() argmax()
```python=

```

## 布林陣列
```python=
arr.any()#是否有true
arr.all()#是否全部true
#也可用在非布林,非0=True
```

## arr.sort(axis=1) (in-place)
```python=
#可傳入軸參數排序某個軸
```

## 唯一值 np.unique()
```python=

```

## 檢查是否存在 np.in1d(arr1,arr2)
```python=
#檢查arr1在arr2的狀況,返回boolin
```

## 儲存或讀取 np.load(".npy") np.save('',arr)
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```

## 
```python=

```

##
```python=

```