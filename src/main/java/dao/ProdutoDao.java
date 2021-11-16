package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Produto;



public class ProdutoDao {

	private Connection con = null; 
	
	public String salvar(Produto produto) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(produto);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Produto: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Produto produto) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(produto);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Produto: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Produto produto) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Produto c = em.find(Produto.class, produto.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Produto: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Produto> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Produto");
			return q.getResultList();				
		}
		
		public Produto getProduto(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Produto produto = (Produto) em.createQuery("SELECT c from Produto c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return produto;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
