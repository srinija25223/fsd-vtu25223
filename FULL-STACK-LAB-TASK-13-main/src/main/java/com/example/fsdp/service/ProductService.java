package com.example.fsdp.service;

import java.util.List;
import com.example.fsdp.entity.Product;

public interface ProductService {

    Product saveProduct(Product product);

    List<Product> getAllProducts();

    Product getProductById(Long id);

    Product updateProduct(Long id, Product product);

    void deleteProduct(Long id);

}