<style>
    .card {
        border-radius: 4px;
        position: relative;
        overflow: hidden;
        height: 200px;
    }
    .card:hover{
        opacity:0.8;
        .bottom-title {
            background-color: #666;
        }
    }

    .card img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 1;
    }

    .card .bottom-title {
        position: absolute;
        bottom: 0;
        left: 0;
        z-index: 2;

        width: 100%;
        background-color: #00aff0;
        text-align: center;
         font-weight: 600;
         text-transform: capitalize;
         overflow: hidden;
         text-overflow: ellipsis;
         white-space: nowrap;
         padding: 5px;
         color: #fff;
         font-size: 12px;
    }

    .card {
        width: calc(25% - 10px);
    }
    .lock-icon{
        color: #fff;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50% , -50%);
        z-index: 3;
    }
    .price{
        position: absolute;
        top: 10px;
        width: fit-content;
        padding: 2px 10px;
        background-color: red;
        color: #ffff;
        z-index: 3;
        font-size: 10px;
        
    }
    .vidio-info{
        position: absolute;
        bottom: 30px;
        left: 0;
        display: flex;
        justify-content: space-between;
        z-index: 3;
        width: 100%;
        color: #fff;
        font-size: 10px;
        padding: 5px;
    }

    @media only screen and (max-width: 992px) {
        .card {
            width: calc(33.33% - 10px);
        }
    }

    @media only screen and (max-width: 768px) {
        .card {
            width: calc(50% - 10px);
        }
    }
</style>
<div class="shadow-lg card">
    <div class="lock-icon">
        <i class="fa-solid fa-lock"></i>
    </div>
    <a href="">
        <div>
            <img src="https://api.fanso.club/avatars/iqxfw-236903663_265766858375887_2609456498566276573_n.jpg" alt=""
                class="post-image">
            <div class="vidio-info">
                <div class="icons">
                    <span>
                        <i class="fa-regular fa-eye"></i>
                        <span>23</span>
                    </span>
                    <span>
                        <i class="fa-regular fa-thumbs-up"></i>
                        <span>1</span>
                    </span>
                </div>
                <div class="duration">
                    <i class="fa-solid fa-hourglass"></i>
                    <span>00.24</span>
                </div>
            </div>
            <div class="price">
                <span>$40.00</span>
            </div>
            <div {{ Popper::arrow()->size('small')->pop(' is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has'); }} class="bottom-title">
                <p>Lorem ipsum dolor sit amet...</p>
            </div>
        </div>
    </a>
</div>