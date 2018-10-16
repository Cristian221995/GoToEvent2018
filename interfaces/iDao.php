<?php namespace interfaces;
       interface IDao
       {
       	 public function insert($dato);
       	 public function delete($dato);
         public function update($dato, $datonuevo);
         public function retride();
       }
  ?>
