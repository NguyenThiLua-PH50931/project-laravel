<x-app-layout title="Liên hệ">
<div class="container">
    <div>
        <hr>
        <h2 style="font-size: 25px; color:#5e7329">Liên hệ</h2>
        <hr>
    </div>
    <div class="contact-container">
        <h3 class="text-center" style="color: #5c6720">Hãy để lại lời nhắn, chúng tôi sẽ phản hồi sớm nhất!</h3>
        
        <div class="contact-info">
            <p><strong>Địa chỉ:</strong> Số 1 – Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
            <p><strong>Email:</strong> luantph50931@gmail.com</p>
            <p><strong>Hotline:</strong> 0971 918 183</p>
        </div>
        
        <form>
            <div class="mb-3">
                <label for="name" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Lời nhắn</label>
                <textarea class="form-control" id="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn w-100 nut">Gửi yêu cầu</button>
        </form>
    </div>
</div>
</x-app-layout>
