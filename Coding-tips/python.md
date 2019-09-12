# Python coding tips

[TOC]

## 二元運算子
```python=
a // b #a除以b取整數
a ** b #a作ｂ次方
a^b #只能有一個為True(Exclusive or)
a == b #值相等為True

'''
is & is not 通常用來檢查None,因為None實例只有一個
'''
a is b #同物件為True
a is not b #不同物件為True
```

## string processing
```python=
#三引號換行str：
x = '''
hello
i'm
Howard
'''
#用count算有幾個換行符號
x.count('/n')

#immutable,需用replace取代原本字串
z = x.replace('Howard','Jackson')

#escape character
/n
#若真的要表達/:
//
```

### str.format()
```python=
template = '{0:.2f}{1:s}are worth US${2:d}'
#.2f：取到小數點後兩位
#s：轉換為str
#d：轉換成整數
template.formate(4.5560,'iphone',1000)
```

## tuple
· immutable
```python=
tup = tuple('string')
#tup = ('s','t','r','i','n','g')

#儲存在tuple中的物件如果是mutable可以直接修改
tup = (1,[4,3,6],3)
tup[1].append(5)
#tup = (1,[4,3,6,5],3)

#拆解tuple
tup = (1,2,3)
a,b,c = tup
```
### *rest
```python=
#從開頭摘取部分元素
values = 1,2,3,4,5
a,b,*rest = values
#a,b = (1,2)
#rest[3,4,5]

#其餘捨棄 *_
a,b, *_ = values
```
## List

### insert()
```python=
#插入數據 O(n)
#list.insert(loc,value)
a = [1,2,3]
a.insert(0,5)
#a = [5,1,2,3]
＊數據太大使用collections.deque()
```

### pop()
```python=
#移除索引元素
#list.pop(loc)
a = [1,2,3]
a.pop(1) #2
# a = [1,3]
```

### remove()
```python=
#刪除第一個符合的元素
#list.remove(value)
a = [1,2,3,5,2,6]
a.remove(2)
#a = [1,3,5,2,6]
```

### 檢察list or tuple是否有指定值
```python=
#in
a = [1,2,3,4]
2 in a
#True
6 not in a
#True
```

### extend()
```python=
#list合併
#extend(value or list)
a = [1,2]
a.extend(2,3)
#a = [1,2,2,3]
＊不要用list = list + list, 要定義新物件運算量太大
```

### sort()
```python=
#排序
#list.sort(key=)
a = [1,3,2,4]
a.sort()
可使用：key=len
#a = [1,2,3,4]
```

### bisect()
```python=
#對排序好的list做二元搜尋及插入
import bisect
a = [1,2,3,4,5]
#bisect用來找到對的位置
bisect.bisect(a,2)
#2
##insort用來插入對的位置
bisect.insort(a,5)
*耗費成本高，不會檢查是否排序對，因此一定要排序好再使用
```

### slice
```python=
#切片
#list[start:stop]
只會包含start 不包含stop
#list[::2]
第一個分號後面表示間隔多少
#seq[::-1]
從後面每個都拿，即代表反轉list
```

### list comprehension
```python=
[expr for val in collections if condition]
#雙層comprehension
list_ = []
for x in collections:
    for y in x:
        list_.append(y)
#可改寫
list_[y for x in collections for y in x]
```


## Dictionary

### pop()
```python=
＃與list一樣丟出資料
x = dict_.pop('key')
```

### update()
```python=
#合併dict
dict_.update(dict1)
```

### 序列合併成dict
```python=
mapping = dict(zip(range(5), reversed(range(5))))
```

### 檢查是否可當dict的key
```python=
#hashable才能當key,若放入list會出現unhashable
hash('saijd')
```

### dict comprehension
```python=
{key-expr: value-expr for value in collection if condition}
```
## Set

### Set comprehension
```python=
{expr for value in collection if condiction}
```

## re

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```
## def

### docstring
```python=
def func():
    '''this shit is call docstring'''
    print('yeah')
    retun
```
### global

```python=
num = 6
def x():
    '''
    全域改變外面的num
    '''
    global num
    print(num)
    #num=6
```

### nonlocal
```python=
def outter():
    '''
    使用且更改外層n(雙層def才能使用)
    '''
    n = 1
    def inner():
        nonlocal n
        n = 2
    inner()
    print(n)
    #n = 2
```

### default argument
```python=
def func(n, echo = 1, print = False):
    '''
    default argument 可給可不給
    '''
    if print is False:
        print(n*echo)
    else:
        print(n)
```

### variable-length arguments *args
```python=
def func(*args):
    '''
    不確定輸入長度
    '''
    hodgepodge = str() 
    
    for word in args:
        hodgepodge += word
        
    return hodgepodge
    
func('abc','defg','hijkl')
```

### variable-length keyword argument **kwargs
```python=
def func(**kwargs):
    '''
    print keys and values
    '''
    for keys, values in kwargs.items():
        print(keys + ": " + values)
        
func(a="1",d="11")
```

## builtin functions

### map()
```python=
#map(func,list)
list_ = [1,2,3,4,5]
double = map(lambda x:x*2,list_)
print(list(double))
```

### filter()
```python=
#filter(func,list)
'''
map是全部都跑,跑判斷式結果會是True,False，filter會篩選
出符合條件的element
'''
list_ = ['frodo', 'samwise', 'merry', 'pippin', 'aragorn', 'boromir', 'legolas', 'gimli', 'gandalf']
filter_ = filter(lambda x:len(x)>6,list_)
print(list(filter_))
```

### reduce()
```python=
#reduce(func,list)
'''
會將結果再次傳回func，例如底下 x1 = 1 , x2 = 2 相加後
下一輪 x1 = 3(old x1+x2), x2 = 3(from list_)
'''
from functools import reduce  
list_ = [1,2,3,4,5]
sum_ = reduce(lambda x1,x2 : x1+x2 ,list_)
```

### isinstance()
```python=
#isinstance(obj, type)
'''
檢查物件是否為特定型態 
e.g. int,tuple((int,float))
'''
istance(1, (int,float)
#return True
```

### getattr()
```python=
#getattr(obj,name[,default])
class A(obj):
    bar = 1

a = A()
getattr(a,'bar')
#return = 1
```

### iter()
```python=
#iter(obj)
'''
可迭代對象 e.g. string,list,dict(會print出key)
'''
for i in iter('abcde'):
    print(i)
#return
a
b
c
d
e
```

### id()
```python=
#id(obj)
'''
查找物件記憶體位置
'''
a = 1
id(1)
```

### format()
```python=

```

### enumerate()
```python=
#迭代
#enumerate(list)
#return (index,value)
a = [1,2,3]
mapping = {}
for i, v in enumerate(a):
    mapping[v] = i
```

### sorted()
```python=
#排序，參數與list.sort一樣
sort(object)
#return list
```

### zip()
```python=
#元素配對合併
#zip(obj,obj)
#可接受任一長度，以最短元素決定合併長度，其餘就刪掉
seq1 = ['foo','bar','baz']
seq2 = ['one','two','three']
zipped = zip(seq1,seq2)
#return [('foo','one'),('bar','two'),('baz','three')]

#也可反向拆分
seq1, seq2 = zip(*zipped)
```

### reversed()
```python=
list(reversed(range(10)))
#return [9,8,7,6,5,4,3,2,1,0]
```

### strip()
```python=
#刪除前後空格
a = '  jsrk '
strip(a)
#'jsrk'
```

### 
```python=

```

### 
```python=

```

### 
```python=

```
## Error handling

### try,except
```python=
def positive(x):
    try:
        x += 1
    except:
        print("input must be an integer")
    return x

#可以設定什麼type error 會出現
def attempt_float(x):
    try:
        print(float(x))
    except (ValueError, TypeError):
        return x
    else:#else是在try發生時才會發生
        print('yes')
    finally:#不論try成功與否都會執行
        print('finally')
        
#需要根據raise出的error來執行其他動作
import pyodbc
except pyodbc.TypeError
    print x
except pyodbc.ValueError
    print y
```

### raise Error
```python=
def positive(x):
    if x < 0:
        raise ValueError('x must be positive')
    x += 1
    return x
```

## hot key
### ?,??
```python=
加問號：
    顯示資訊(e.g. docstring)
雙問號：
    顯示原始函式(e.g. 顯示function)
```

### 附屬函式名稱搜索
```python=
e.g. np.*load*?
顯示所有包含load的函示
np.__load__
np.load
.
.
.
```
## magic command

### %run
```python=
在 ipython 執行 .py
```

### %load
```python=
讀取 .py 函式
```

### %time 
```python=
檢查statement執行時間
```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

### 
```python=

```

