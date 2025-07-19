@extends('frontends.layouts.master')
@section('title','Data Recovery Process')
@section('meta_keyword','Data Recovery Process, Data Recovery DB')
@section('meta_description','Data Recovery Process, Data Recovery DB')
@section('content')

    <div class="blog-hero-area">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                        <h2 class="wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Data Recovery Process</h2>
                        <p class="white-text-color">Our Company Data Recovery Process</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="business-plan" class="data-recover-process-section">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12 pl-4">
                    <div class="business-item-info">
                        <h3>Data Recovery Process</h3>
                        <p>In the era of computing, data loss is inevitable. However, with the help of data recovery software, it is not difficult to have a backup.</p>
                        <p>We can recover lost data from unreadable disks with the help of data recovery software and a few simple steps. The process of this operation is fairly easy and in most cases can be done by following some instructions given by a specialist.</p>
                        <p>The first step in this process would be to find out if the data can be accessed at all, which could be done by running scans and checks on the disk or partition that contains these files. If it cannot be accessed then the only way to get them back is to use something called Data Recovery Software and follow its instructions on how to proceed further.</p>
                        <p>The second step would be performing an analysis on the disks or partitions with such software as well as recovering them one-by-one if they are not corrupt or too heavily damaged.</p>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12 col-md-12 pl-4">
                    <p class="text-heading">This process could take up to several days depending</p>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9 col-md-12 pl-4">
                    <div class="business-item-info phase-text">
                        <h3>Phase 1</h3>
                        <p class="text-heading">Repair the hard disk drive</p>
                        <p>Repair the hard disk drive so it is running in some form, or at least in a state suitable for reading the data from it. For example, if heads are bad they need to be changed; if the PCB is faulty then it needs to be fixed or replaced; if the spindle motor is bad the platters and heads should be moved to a new drive.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="simple-image-position">
                        <img src="{{asset('design/img/business/data-recover-process-phase-1.jpg')}}" class="img-fluid margin-top-100" alt="Data Recovery BD Vision">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9 col-md-12 pl-4">
                    <div class="business-item-info phase-text">
                        <h3>Phase 2</h3>
                        <p class="text-heading">Image the drive to a new drive or a disk image file</p>
                        <p>When a hard disk drive fails, the importance of getting the data off the drive is the top priority. The longer a faulty drive is used, the more likely further data loss is to occur. Creating an image of the drive will ensure that there is a secondary copy of the data on another device, on which it is safe to perform testing and recovery procedures without harming the source.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="simple-image-position">
                        <img src="{{asset('design/img/business/data-recover-process-phase-3.jpg')}}" class="img-fluid margin-top-100" alt="Data Recovery BD Vision">
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-9 col-md-12 pl-4">
                    <div class="business-item-info phase-text">
                        <h3>Phase 3</h3>
                        <p class="text-heading">Logical recovery of files, partition, MBR and file system structures</p>
                        <p>After the drive has been cloned to a new drive, it is suitable to attempt the retrieval of lost data. If the drive has failed logically, there are a number of reasons for that. Using the clone it may be possible to repair the partition table or master boot record (MBR) in order to read the file system’s data structure and retrieve stored data.</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="simple-image-position">
                        <img src="{{asset('design/img/business/Seagate-ST500DM002-HDD-Data-Recovery-Steps-300x93.jpg')}}" class="img-fluid margin-top-100" alt="Data Recovery BD Vision">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9 col-md-12 pl-4">
                    <div class="business-item-info phase-text">
                        <h3>Phase 4</h3>
                        <p class="text-heading">Repair damaged files that were retrieved</p>
                        <p>Data damage can be caused when, for example, a file is written to a sector on the drive that has been damaged. This is the most common cause in a failing drive, meaning that data needs to be reconstructed to become readable. Corrupted documents can be recovered by several software methods or by manually reconstructing the document using a hex editor</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                    <div class="simple-image-position">
                        <img src="{{asset('design/img/business/data-recover-process-phase-3.jpg')}}" class="img-fluid margin-top-100" alt="Data Recovery BD Vision">
                    </div>
                </div>
            </div>


        </div>
    </section>


@endsection
