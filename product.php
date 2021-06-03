<!-- 
Filename: product.html
Author: Michelle Chuwindra
Created: 27 Mar 2021
Last Modified: 28 Mar 2021
Description: Product page for Assignment 1
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assignment 1 submission: Laptop Computer shop product page" />
    <meta name="keywords" content="HTML5, CSS, tags" />
    <meta name="author" content="Michelle Chuwindra"  />
    <title>Products</title>
    <link href="styles/style.css" rel="stylesheet"/>

</head>
<body>
    <header>
        <?php
            include ('header.inc');
            include ('menu.inc');
        ?>       
    </header>
    <article>
        <h1 class="producth1">Our Products</h1>
        <h3>Currently we supply:</h3>
            <ol>
                <li><a href="#lappies">Laptop Computers</a>
                    <ul>
                        <li>Acer</li>
                        <li>HP</li>
                    </ul><br />
                </li>            
                <li><a href="#apple">Apple Macbooks</a><br /><br /></li>
                <li><a href="#gaming">Gaming Laptops</a>
                    <ul>
                        <li>ROG</li>
                    </ul><br />
                </li>
            </ol>
        <hr />
        <section id="lappies">
            <h2>Laptop Computers</h2>
            <h3>Acer Aspire 3 Notebook</h3>
            <img src="images/acer.jfif" alt="Acer Aspire 3 Notebook" class="acerimg"/>
            <br /><br /><br />
            <table class="productdesc">
                <thead>
                    <tr class="tableheading">
                        <th>Feature</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Display</th>
                        <th>15.6 inch LCD display with 1366 x 768 resolution</th>
                    </tr>
                    <tr>
                        <th>Processor</th>
                        <th>AMD A4</th>
                    </tr>       
                    <tr>
                        <th>RAM</th>
                        <th>8GB</th>
                    </tr>             
                    <tr>
                        <th>Storage</th>
                        <th>1TB</th>
                    </tr>
                    <tr>
                        <th>Connections</th>
                        <th>WiFi, HDMI, USB 2.0 and 3.0</th>
                    </tr>
                    <tr>
                        <th>Battery Life</th>
                        <th>5.5 hours</th>
                    </tr>
                    <tr>
                        <th>Warranty</th>
                        <th>12 month</th>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>$477.00</th>
                    </tr>
                </tbody>
            </table>
            <br /><br /><br /><br />
            <aside>
                <p>This item is in very high demand. We recommend checking with our team for stock updates. Visit our Enquire page to learn more.</p>
            </aside>
            <a href="https://www.officeworks.com.au/shop/officeworks/p/acer-aspire-3-notebook-15-6-a4-8-1-tb-aca3152240" target="_blank"><em>Image Source</em></a>
            <h4>The Acer Aspire 3 Laptop is ideal for those who love browsing the web, watching videos on their device and studying either at your desk at work, home or even on the go. </h4>
            <h4>The display helps to prevent eye-strain thanks to BlueLightShield technology and a built-in digital webcam and microphone makes it easy to stay connected online.</h4>
            <br /><br />
            <h3>HP Envy Laptop</h3>
            <img src="images/hp.jfif" alt="HP Envy Laptop" class="hpimg"/>
            <br /><br /><br />
            <table class="productdesc">
                <thead>
                    <tr class="tableheading">
                        <th>Feature</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Display</th>
                        <th>13.3 inch WLED display with 1920 x 1080 resolution</th>
                    </tr>
                    <tr>
                        <th>Processor</th>
                        <th>Intel Core i7</th>
                    </tr>       
                    <tr>
                        <th>RAM</th>
                        <th>8GB</th>
                    </tr>             
                    <tr>
                        <th>Storage</th>
                        <th>512GB SSD</th>
                    </tr>
                    <tr>
                        <th>Connections</th>
                        <th>WiFi, HDMI, USB 3.1, Bluetooth 5.0</th>
                    </tr>
                    <tr>
                        <th>Battery Life</th>
                        <th>11 hours</th>
                    </tr>
                    <tr>
                        <th>Warranty</th>
                        <th>12 month</th>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>$1688.00</th>
                    </tr>
                </tbody>
            </table>
            <br /><br /><br /><br />
            <aside>
                <p>Use code: HPBOOM for a 15% discount at your checkout. T&Cs apply.</p>
            </aside>
            <a href="https://www.officeworks.com.au/shop/officeworks/p/hp-envy-laptop-core-i7-8gb-512gb-13-ba0080tu-hpba0080tu" target="_blank"><em>Image Source</em></a>
            <h4>This HP Envy Laptop helps you work on the go with its lightweight design and long-lasting battery run time. </h4>
            <h4>There are added security features including a fingerprint reader and a camera kill switch, helping keep you and your files safe.</h4>
        </section>
        <hr />
        <section id="apple">
            <h2>Apple - Macbooks</h2>
            <h3>Macbook Pro</h3>
            <img src="images/macbook.jfif" alt="Macbook Pro" class="macimg"/>
            <br /><br /><br />
            <table class="productdesc">
                <thead>
                    <tr class="tableheading">
                        <th>Feature</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Display</th>
                        <th>13 inch Retina display with 2560 x 1600 resolution</th>
                    </tr>
                    <tr>
                        <th>Processor</th>
                        <th>Apple M1 chip</th>
                    </tr>       
                    <tr>
                        <th>RAM</th>
                        <th>8GB</th>
                    </tr>             
                    <tr>
                        <th>Storage</th>
                        <th>256GB SSD</th>
                    </tr>
                    <tr>
                        <th>Connections</th>
                        <th>2 Thunderbolt/USB 4 ports</th>
                    </tr>
                    <tr>
                        <th>Battery Life</th>
                        <th>10 hours</th>
                    </tr>
                    <tr>
                        <th>Warranty</th>
                        <th>12 month</th>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>$1999.00</th>
                    </tr>
                </tbody>
            </table>
            <br /><br /><br /><br />
            <a href="https://www.apple.com/au/shop/buy-mac/macbook-pro" target="_blank"><em>Image Source</em></a>
            <h4>The Apple M1 chip gives the 13‑inch MacBook Pro speed and power beyond belief. With up to 2.8× CPU performance. Up to 5× the graphics speed. </h4>
            <h4>Our most advanced Neural Engine for up to 11× faster machine learning. And up to 20 hours of battery life — the longest of any Mac ever. </h4>
            <h4>It’s our most popular pro notebook, taken to a whole new level.</h4>
        </section>
        <hr />
        <section id="gaming">
            <h2>Gaming Laptops</h2>
            <h3>ASUS ROG Strix G15</h3>
            <img src="images/rog.jpg" alt="ASUS ROG Strix G15" class="rogimg"/>
            <table class="productdesc">
                <thead>
                    <tr class="tableheading">
                        <th>Feature</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Display</th>
                        <th>15.6 inch IPS screen with 1920 x 1080 resolution</th>
                    </tr>
                    <tr>
                        <th>Processor</th>
                        <th>Intel Core i7</th>
                    </tr>       
                    <tr>
                        <th>RAM</th>
                        <th>16GB</th>
                    </tr>             
                    <tr>
                        <th>Storage</th>
                        <th>512GB SSD</th>
                    </tr>
                    <tr>
                        <th>Connections</th>
                        <th>HDMI, 1 x USB Type C, 3 x USB Type A</th>
                    </tr>
                    <tr>
                        <th>Battery Life</th>
                        <th>5.5 hours</th>
                    </tr>
                    <tr>
                        <th>Warranty</th>
                        <th>12 month</th>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>$1919.00</th>
                    </tr>
                </tbody>
            </table>
            <br /><br />
            <aside>
                <p>Join our newsletter today for a member exclusive deal up to 20% off on this item!</p>
            </aside>
            <a href="https://www.harveynorman.com.au/rog-strix-g15-15-6-inch-i7-10750h-16gb-512gb-ssd-gtx1660ti-6gb-laptop.html" target="_blank"><em>Image Source</em></a>
            <h4>Packed with innovative features, the ROG Strix G15 15.6-inch i7-10750H/16GB/512GB SSD/GTX1660Ti 6GB Laptop is an ideal companion for the dedicated gamer.</h4>
            <h4>Boasting a slim design coupled with a powerful NVIDIA graphics card, this laptop lets you take high-performance gaming with you in different settings.</h4>
        </section>   
        <br /><br />     
        <hr />
    </article>
    <footer class="productfooter">
        <?php include('footer.inc'); ?>
    </footer>
</body>
</html>
