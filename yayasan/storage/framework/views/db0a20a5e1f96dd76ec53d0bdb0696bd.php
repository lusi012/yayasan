

<?php $__env->startSection('content'); ?>

<nav>
    <ul class="flex space-x-4">
     <li>
      <a class="hover:text-gray-400" href="#home.html">
       Home
      </a>
     </li>
     <li>
      <a class="hover:text-gray-400" href="Information.html">
       Information
      </a>
     </li>
     <li>
      <a class="hover:text-gray-400" href="<?php echo e(route('gambar')); ?>">
       Gallery
      </a>
     </li>
     <li>
      <a class="hover:text-gray-400" href="contact.html">
       Contact
      </a>
     </li>
    </ul>
   </nav>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('h', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\yayasan\resources\views/navbar.blade.php ENDPATH**/ ?>