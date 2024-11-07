<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }
    footer {
      background-color: #ff7f50;
      color: white;
      padding: 40px 20px;
    }
    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }
    .footer-section {
      flex-basis: 20%;
      margin-bottom: 30px;
    }
    .footer-section h3 {
      margin-top: 0;
    }
    .footer-section ul {
      list-style-type: none;
      padding: 0;
    }
    .footer-section li {
      margin-bottom: 10px;
    }
    .footer-section a {
      color: white;
      text-decoration: none;
    }
    .footer-section a:hover {
      text-decoration: underline;
    }
    .social-icons {
      display: flex;
      justify-content: flex-start;
      margin-top: 20px;
    }
    .social-icons a {
      display: inline-block;
      margin-right: 10px;
      font-size: 20px;
    }
  </style>
</head>
<body>
  <footer>
    <div class="footer-container">
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p>Công viên phần mềm Quang Trung,Tân Chánh Hiệp, Quận 12, Tp.HCM. <br><br>
        nhathuy16122005@gmail.com <br><br>  
        +84 0987 654 321</p>
        <div class="social-icons">
          <a href="#"><img src="./imgs/cc/fb.ipg" alt=""><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-github"></i></a>
        </div>
      </div>
      <div class="footer-section">
        <h3>Product</h3>
        <ul>
          <li><a href="#">Landing Page</a></li>
          <li><a href="#">Popup Builder</a></li>
          <li><a href="#">Web-design</a></li>
          <li><a href="#">Content</a></li>
          <li><a href="#">Integrations</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Resources</h3>
        <ul>
          <li><a href="#">Academy</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Themes</a></li>
          <li><a href="#">Hosting</a></li>
          <li><a href="#">Developers</a></li>
          <li><a href="#">Support</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Company</h3>
        <ul>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Careers</a></li>
          <li><a href="#">FAQs</a></li>
          <li><a href="#">Teams</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3>Use Cases</h3>
        <ul>
          <li><a href="#">Web-designers</a></li>
          <li><a href="#">Marketers</a></li>
          <li><a href="#">Small Business</a></li>
          <li><a href="#">Website Builder</a></li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>