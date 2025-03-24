## 
**
1. Bảng users: 
id : incre
name: string, 200
email: string 100
password: string 50
phone: int 20
address: text
role: enum('khách hàng','admin') DEFAUL 'khách hàng'
created_at, updated_at

2. Bảng categories:
id
name string 100

3. Bảng products:
id
category_id int foreign (tham chiếu bảng categories)
name string 100
price float(8,2)
image varchar 150
description text
view int (có thể null)

4. Bảng orders: Đơn hàng
int
user_id(int, foreign tham chiếu bảng users)
total_price float (8,2)
status enum('chờ xử lý','đang xử lý','đã giao hàng','đã nhận hàng','đã hủy') DEFAUL 'chờ xử lý'

5. Bảng order_items: chi tiết đơn hàng
id
order_id (int, foreign, tham chiếu bảng orders)
product_id (int, foreign, tham chiếu bảng products)
quantity int
price float(8,2)

6. Bảng payments thanh toán:
id
order_id (int, foreigin, tham chieus bảng orders)
payment_method enum('chuyển khoản','thanh toán khi nhận hàng')
status enum('đang chờ thanh toán','đã thanh toán','thanh toán thất bại') DEFAUL ('đang chờ thanh toán')


7. Bảng comments(Bình luận sản phẩm)
id
user_id (int, foriegn, tham chiếu bảng users)
product_id(int, foriegn, tham chiếu bảng products)
comment text

8. Bảng wishlists (danh sách yêu thích)
id
user_id(int foriegn)
product_id (int foriegn)

**
