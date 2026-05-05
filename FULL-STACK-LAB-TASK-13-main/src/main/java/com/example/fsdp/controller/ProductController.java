package com.example.fsdp.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

import jakarta.validation.Valid;

import com.example.fsdp.entity.Product;
import com.example.fsdp.service.ProductService;

@RestController
@RequestMapping("/products")
public class ProductController {

    @Autowired
    private ProductService service;

    // CREATE
    @PostMapping("/create")
    public Product createProduct(@Valid @RequestBody Product product){
        return service.saveProduct(product);
    }

    // READ ALL
    @GetMapping("/read")
    public List<Product> getAllProducts(){
        return service.getAllProducts();
    }

    // READ BY ID
    @GetMapping("/read/{id}")
    public Product getProductById(@PathVariable Long id){
        return service.getProductById(id);
    }

    // UPDATE
    @PutMapping("/update/{id}")
    public Product updateProduct(@PathVariable Long id, @Valid @RequestBody Product product){
        return service.updateProduct(id, product);
    }

    // DELETE
    @DeleteMapping("/delete/{id}")
    public String deleteProduct(@PathVariable Long id){
        service.deleteProduct(id);
        return "Product deleted successfully";
    }
}