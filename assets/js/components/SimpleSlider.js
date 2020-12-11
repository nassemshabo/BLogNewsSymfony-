import React, { Component } from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";


export default class SimpleSlider extends Component {
    render() {
        const settings = {
            dots: true,
            infinite: true,
            speed: 500,
            slidesToShow: 1,
            slidesToScroll: 1
        };

        const sliderData = [
            {
                value : 1 ,
                background :'green'
            },
            {
                value : 2 ,
                background :'blue'
            },
            {
                value : 1 ,
                background :'red'
            }
        ];
        return (
            <div style={{height:'300px'}}>
                <Slider {...settings}>
                    {sliderData.map(slide => (
                        <div>
                            <div style={{backgroundColor: slide.background, height:"600px"}}>
                               <h1>{slide.value}</h1>
                            </div>
                        </div>
                    ) )}
                </Slider>
            </div>
        );
    }
}