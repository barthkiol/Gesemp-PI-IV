package dao;

import java.sql.*;
import java.util.*;

import javax.persistence.EntityManager;
import javax.persistence.NoResultException;
import javax.persistence.Query;

import Classes.Atributo;



public class AtributoDao {

	private Connection con = null; 
	
	public String salvar(Atributo atributo) throws Exception {
		//String retorno;
		try {
			EntityManager em = Conexao.getEntityManager();			
			em.getTransaction().begin();
			em.persist(atributo);
			em.getTransaction().commit();			
			return "Ok";
		} catch(Exception e) {
			throw new Exception("Erro gravando Atributo: "+e.getMessage());
		} 
					
	}
	// alterar
		public String alterar(Atributo atributo) throws Exception {
			try {			
				EntityManager em = Conexao.getEntityManager();			
				em.getTransaction().begin();
				em.merge(atributo);
				em.getTransaction().commit();			
				return "Ok";			
			} catch(Exception e) {
				throw new Exception("Erro gravando Atributo: "+e.getMessage());
			}		
		}
		
		// excluir
		public String deletar(Atributo atributo) throws Exception {
			try {
				EntityManager em = Conexao.getEntityManager();
				Atributo c = em.find(Atributo.class, atributo.getId());
				em.getTransaction().begin();
				em.remove(c);
				em.getTransaction().commit();			
				return "Ok";
			}catch(Exception e) {
				throw new Exception("Erro gravando  Atributo: " + e.getMessage());
			}		
		}	
		
		// consultar
		public List<Atributo> consultar() throws Exception{
			// criar uma var para lista
			EntityManager em = Conexao.getEntityManager();
			Query q = em.createQuery("from Atributo");
			return q.getResultList();				
		}
		
		public Atributo getAtributo(Integer id) {

			 EntityManager em = Conexao.getEntityManager();
		      try {
		    	  Atributo atributo = (Atributo) em.createQuery("SELECT c from Atributo c where c.id = :id").setParameter("id", id).getSingleResult();
		      

		        return atributo;
		      } catch (NoResultException e) {
		            return null;
		      }
		    }
}
