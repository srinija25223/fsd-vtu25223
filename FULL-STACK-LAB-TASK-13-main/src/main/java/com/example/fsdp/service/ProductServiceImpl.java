package com.example.fsdp.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.fsdp.entity.Product;
import com.example.fsdp.exception.ResourceNotFoundException;
import com.example.fsdp.repository.ProductRepository;

@Service
public class ProductServiceImpl implements ProductService{

    @Autowired
    private ProductRepository repository;

    @Override
    public Product saveProduct(Product product){
        return repository.save(product);
    }

    @Override
    public List<Product> getAllProducts(){
        return repository.findAll();
    }

    @Override
    public Product getProductById(Long id){
        return repository.findById(id)
                .orElseThrow(() -> new ResourceNotFoundException("Product not found with id "+id));
    }

    @Override
    public Product updateProduct(Long id, Product product){

        Product existing=getProductById(id);

        existing.setName(product.getName());
        existing.setPrice(product.getPrice());
        existing.setQuantity(product.getQuantity());

        return repository.save(existing);
    }

    @Override
    public void deleteProduct(Long id){

        Product existing=getProductById(id);

        repository.delete(existing);
    }
}