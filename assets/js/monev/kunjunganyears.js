kunjungan();
kunjunganpoli();

$(document).on("change", "select[name='toolbar_kunjunganyears_periode']", function (e) {
    e.preventDefault();
    kunjungan();
    kunjunganpoli();
});

function kunjungan(){
    var periode = $("select[name='toolbar_kunjunganyears_periode']").val();
    $.ajax({
        url       : url+"index.php/monev/kunjunganyears/kunjungan",
        data      : {periode:periode},
        method    : "POST",
        dataType  : "JSON",
        beforeSend: function () {
            $("#chartkunjunganrjri").html("");
            $("#chartkunjunganrj").html("");
            $("#chartkunjunganri").html("");
        },
        success : function(data){
            var label  = [];
            var rj     = [];
            var ri     = [];
            var avgrj  = 0;
            var avgri  = 0;
            var result = data.responResult;
            
            for (var i in result) {
                label.push(result[i].periode);
                rj.push(result[i].jmlrj);
                ri.push(result[i].jmlri);

                avgrj=result[i].avgrj;
                avgri=result[i].avgri;
            }

            

            var rjri = {
                chart: {
                    type: 'bar',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: true,
                        easing : 'easeinout',
                        speed  : 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    }
                },
                plotOptions: {
                    bar: {
                      horizontal: false,
                      columnWidth: '40%',
                      endingShape: 'rounded'
                    },
                },
                series: [
                    {name:'Pasien Rawat Jalan', data: rj},
                    {name:'Pasien Rawat Inap', data: ri}
                ],
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                fill: {
                    opacity: 1
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: label
                },
                yaxis: [
                    {
                        labels: {
                            show: true,
                            formatter: function (value) {
                                return todesimal(value);
                            }
                        },
                        title: {
                            text: 'Kunjungan pasien rawat jalan tahun ini'
                        }
                    },
                    {
                        labels: {
                            show: true,
                            formatter: function (value) {
                                return todesimal(value);
                            }
                        },
                        title: {
                            text: 'Kunjungan pasien rawat inap tahun ini'
                        },
                        opposite: true
                    }
                ]
            };

            var rj = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: true,
                        easing : 'easeinout',
                        speed  : 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    }
                },
                colors: ['#009EF7'],
                series: [
                    {name:'Pasien Rawat Jalan', data: rj}
                ],
                stroke: {
                    show : true,
                    width: 2,
                    curve: 'smooth'
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: label
                },
                yaxis: {
                    labels: {
                        show: true,
                        formatter: function (value) {
                            return todesimal(value);
                        }
                    },
                    title: {
                        text: 'Kunjungan pasien rawat jalan tahun ini'
                    }
                },
                annotations: {
                    yaxis: [
                        {
                            y: avgrj,
                            borderColor: '#FF4560',
                            label: {
                                borderColor: '#FF4560',
                                style: {
                                    color: '#fff',
                                    background: '#FF4560'
                                },
                                text: 'Rata rata kunjungan pasien rawat jalan '+todesimal(avgrj)
                            }
                        }
                    ]
                }
            };

            var ri = {
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: true,
                        easing : 'easeinout',
                        speed  : 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    }
                },
                colors: ['#009EF7'],
                series: [
                    {name:'Pasien Rawat Inap', data: ri}
                ],
                stroke: {
                    show : true,
                    width: 2,
                    curve: 'smooth'
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: label
                },
                yaxis: {
                    labels: {
                        show: true,
                        formatter: function (value) {
                            return todesimal(value);
                        }
                    },
                    title: {
                        text: 'Kunjungan pasien rawat inap tahun ini'
                    }
                },
                annotations: {
                    yaxis: [
                        {
                            y: avgri,
                            borderColor: '#FF4560',
                            label: {
                                borderColor: '#FF4560',
                                style: {
                                    color: '#fff',
                                    background: '#FF4560'
                                },
                                text: 'Rata rata kunjungan pasien rawat inap '+todesimal(avgri)
                            }
                        }
                    ]
                }
            };

            new ApexCharts(document.querySelector("#chartkunjunganrjri"),rjri).render();
            new ApexCharts(document.querySelector("#chartkunjunganrj"),rj).render();
            new ApexCharts(document.querySelector("#chartkunjunganri"),ri).render();

        }
    });
    return false;
};

function kunjunganpoli(){
    var periode = $("select[name='toolbar_kunjunganyears_periode']").val();
    $.ajax({
        url       : url+"index.php/monev/kunjunganyears/kunjunganpoli",
        data      : {periode:periode},
        method    : "POST",
        dataType  : "JSON",
        beforeSend: function () {
            $("#chartkunjunganpoli").html("");
        },
        success : function(data){
            var label     = [];
            var tahunini  = [];
            var tahunlalu = [];
            var result    = data.responResult;
            
            for (var i in result) {
                label.push(result[i].namapoli);
                tahunini.push(result[i].jmltahunini);
                tahunlalu.push(result[i].jmlthnlalu);
            }

            var poli = {
                chart: {
                    type: 'bar',
                    height: 1300,
                    toolbar: {
                        show: false
                    },
                    animations: {
                        enabled: true,
                        easing : 'easeinout',
                        speed  : 800,
                        animateGradually: {
                            enabled: true,
                            delay: 150
                        },
                        dynamicAnimation: {
                            enabled: true,
                            speed: 350
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: true,
                        columnWidth: '90%',
                        barHeight: '80%',
                        endingShape: 'rounded',
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                series: [
                    {name:'Tahun ini', data: tahunini},
                    {name:'Tahun lalu', data: tahunlalu}
                ],
                tooltip: {
                    shared: true,
                    intersect: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['#fff']
                },
                dataLabels: {
                    enabled: true,
                    offsetX: -6,
                    style: {
                      fontSize: '12px',
                      colors: ['#fff']
                    },
                    formatter: function (value) {
                        return todesimal(value);
                    }
                },
                xaxis: {
                    categories: label,
                    labels: {
                        show: true,
                        align: 'right',
                        formatter: function (value) {
                            return todesimal(value);
                        }
                    },
                },
                yaxis: {
                    labels: {
                        show: true,
                        align: 'right'
                    },
                    title: {
                        text: "Polikinik rawat jalan"
                    }
                },
            };
            

            new ApexCharts(document.querySelector("#chartkunjunganpoli"),poli).render();

        }
    });
    return false;
};