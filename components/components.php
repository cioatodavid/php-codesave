<?php

function card($title, $download, $edit, $delete)
{
    return "
        <div class='bg-gray-50 p-3 rounded-lg min-w-full  max-w-4xl lg:min-w-[50%] xl:min-w-[40%]'>
            <div class='m-5 flex flex-col items-center gap-5'>
                <h1 class='text-2xl font-semibold text-center'>$title</h1>
                
                " . multiBtn($edit, $download, $delete) . "
                
            </div>
        </div>
    ";
}


function multiBtn($edit, $download, $delete)
{
    return "
    <div class='flex items-center justify-between flex-row gap-3 w-full'>
    <a href='$edit' 

    class='btn btn-primary p-3 bg-indigo-500 flex items-center gap-3 justify-center hover:bg-indigo-700 hover:shadow-md transition-all rounded w-14 text-center text-white'
    ><i class='ri-edit-box-line'></i></a>

    <a href='$download' class='btn flex items-center gap-3 justify-center btn-primary p-3 bg-indigo-500 hover:bg-indigo-700 hover:shadow-md transition-all rounded text-center text-white w-full'><i class='ri-download-cloud-line'></i>Download</a>

    <a href='$delete' class='btn btn-primary p-3 flex items-center gap-3 justify-center bg-red-500 hover:bg-red-700 hover:shadow-md transition-all rounded w-14 text-center text-white'><i class='ri-delete-bin-line'></i></a>
    </div>
    ";
}
